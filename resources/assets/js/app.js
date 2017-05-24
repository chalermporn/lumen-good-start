import Vue from 'vue';
import { createRouter } from './router';

const app = new Vue({
	el: '#app',
	router: createRouter(),
	data(){
		return{
			wlecome: 'Good start with lumen',
			text: 'Lumen + VueJs + Vue Router + Vuex Store'
		}
	}
});
