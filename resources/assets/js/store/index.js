import Vue from 'vue';
import Vuex from 'vuex';
import * as actions from './actions';
import * as getters from './getters';

// import module from './modules/module';
import text from './modules/text'
Vue.use(Vuex)

export default new Vuex.Store({
  actions,
  getters,
  modules: {
  	text
  }
})
