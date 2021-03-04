<template>
<div>
	<div>
	<h1>お店更新</h1>
	<p>Shop Id: {{ shop.id }}</p>
	<form @submit.prevent="updateShop">
		<div class="form-group">
			<label for="shop_name">Name:</label>
			<input v-model="shop.shop_name">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input v-model="shop.email">
		</div>
		<button type="submit">更新</button>
	</form>
	</div>
</div>
</template>

<script>
/* eslint-disable no-console */
	export default {
		data(){
			return {
				id: this.$route.params.id,
				shop:{
					id:'',
					shop_name: '',
					email:''
				}
			}
		},
		methods:{
			updateShop(){
				axios.patch('/api/user/shops/' + this.shop.id,{
					shop: this.shop
				})
				.then(response => {
					this.shop = response.data.shop;
					this.$router.push({ name: 'shop_detail' ,params :{ id: this.$route.params.id }})
				})
				.catch(error => console.log(error));
			},
		},
		created(){
			axios.get('/api/user/shops/' + this.id)
			.then(response => this.shop = response.data.shop)
			.catch(erorr => console.log(error));
		}

	}
</script>