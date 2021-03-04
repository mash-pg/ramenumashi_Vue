<template>
<div>
		<input type="text" v-model="keyword">
		<input type="submit" @click="created(keyword)" value="検索">
		<!-- <img :src="'/img/main/ramen.jpg'" alt="タイトルロゴ"> -->
		<h1>お店一覧</h1>
	<li v-for="shop in shops" v-bind:key="shop.id">
		<!-- <img v-bind:src="'/img/main/'+shop.name+'.jpg'" alt="タイトルロゴ"> -->
			{{ shop.id }}
			{{ shop.shop_name }}
			{{ shop.email }}
			<router-link class="btn btn-success" :to="`/user/shops/${shop.id}`">詳細</router-link>
			<router-link class="btn btn-primary" :to="`/user/shops/${shop.id}/edit`">更新</router-link>
			<span class="btn btn-danger" @click="shopDelete(index, shop.id)">削除</span>
	</li>

	</div>
</template>
<script>
/* eslint-disable no-console */

export default {
		data(){
			return{
				keyword:'',
				shops:[],
			}
		},
		methods:{
			shopDelete(index, id){
				axios.delete('/api/user/shops/' + id)
				     .then(response => {
				     	this.shops.slice(id, 1)
						window.location.reload();
				     })
				     .catch(error => console.log(error));
					window.location.reload();
			},
			created(keyword){
			axios.get('/api/user/shops?name='+ keyword)
				.then(response => {
					console.log(keyword);
					this.shops = response.data.shops;
				})
				.catch(error => {
					console.log(error)
				});
			} 
		},

		created(){
			axios.get('/api/user/shops')
				.then(response => {
					this.shops = response.data.shops;
				})
				.catch(error => {
					console.log(error)
				});
		} 
}
</script>