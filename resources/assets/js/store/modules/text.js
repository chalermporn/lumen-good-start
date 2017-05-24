import * as types from '../mutation-types';
import axios from 'axios';

const state = {
	content: '',
	header: 'What is lorem ipsum'
};

const getters = {
	contentUpperCase: (state)	=> state.content.toUpperCase(),
	getContent: (state)	=> state.content,
}

const mutations = {
	[types.TEXT_REVERSE_HEADER]: (state)	=> {
		state.header = state.header.split('').reverse().join('');
	},
	[types.TEXT_GET_CONTENT]: (state) => {
		axios({
			method: 'get',
			url: 'https://baconipsum.com/api/?type=all-meat&paras=1&start-with-lorem=1'
		}).then(response=>{
			state.content = response.data[0]
		})
	},
	[types.TEXT_SET_CONTENT]: (state, newContent)=>{
		state.content = newContent;
	}
}

const actions = {
	reverseHeader({ commit }){
		commit(types.TEXT_REVERSE_HEADER);
	},
	getContent({ commit }){
		commit(types.TEXT_GET_CONTENT);
	},
	setContent({ commit }, newContent){
		commit(types.TEXT_SET_CONTENT, newContent);
	}
}

export default{
	state,
	getters,
	mutations,
	actions
}