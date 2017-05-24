import Vue from 'vue';
import { createRouter } from './router';
import store from './store';

const app = new Vue({
	el: '#app',
	router: createRouter(),
	store,
	data(){
		return{
			wlecome: 'Good start with lumen',
			text: 'Lumen + VueJs + Vue Router + Vuex Store + Axios'
		}
	}
});
