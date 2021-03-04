<template>
<div>
	<h1>お店詳細</h1>
	
		<li>Shop Id: {{ shop.id }}</li>
		<li>Shop Name: {{ shop.user_name }}</li>
		<li>Shop Email: {{ shop.email }}</li>
</div>
</template>
<script>
	export default {
		data(){
			return {
				id: this.$route.params.id,
				shop: ''
			}
		},
		created(){
			axios.get('/api/user/shops/' + this.id)
			.then(response => this.shop = response.data.shop)
			.catch(erorr => console.log(error));
		}

	}
</script>