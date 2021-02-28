<template>
<div>
	<h1>お店一覧</h1>
  <li v-for="shop in shops" v-bind:key="shop.id">
  {{ shop.name }}
		<router-link class="btn btn-success" :to="`/user/shops/${shop.id}`">詳細</router-link>
		<router-link class="btn btn-primary" :to="`/user/shops/${shop.id}/edit`">更新</router-link>
		<span class="btn btn-danger" @click="shopDelete(index, shop.id)">削除</span>
  </li>

</div>
</template>
<script>
export default {
		data(){
			return{
				shops:[],
			}
		},
		methods:{
			shopDelete(index, id){
				axios.delete('/api/user/shops/' + id)
				     .then(response => {
				     	this.shops.slice(id, 1)
				     })
				     .catch(error => console.log(error));
			},
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