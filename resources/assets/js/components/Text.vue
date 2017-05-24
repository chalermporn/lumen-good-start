<template>
	<div>
		<h1>{{ header }}</h1>
		<p>{{ content }}</p>
	</div>
</template>
<script>
	import { mapGetters, mapState, mapMutations, mapActions } from 'vuex';

	export default{
		computed: {
			...mapState({
				header: state=> state.text.header,
				content: state=> state.text.content
			}),
			...mapGetters({
				contentUpperCase: 'contentUpperCase'
			}),
		},
		methods: {
			...mapMutations({
				reverseHeader: 'reverseHeader'
			}),
			...mapActions({
				reverseHeader: 'reverseHeader',
				setContent: 'setContent',
				getContent: 'getContent'
			}),
		},
		mounted(){
			this.$store.dispatch('getContent');
			setTimeout(()=>{
				this.$store.dispatch('setContent', 'This is the new content');
			}, 10000);
		}
	}
</script>
