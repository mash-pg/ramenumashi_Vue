<template>
<div>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/hooper@0.2.1/dist/hooper.css">
	<script src="https://cdn.jsdelivr.net/npm/hooper@0.2.1/dist/hooper.min.js"></script>
	
	<div class="main-home-h1">
		<div class="main-home-h1-1">
			<h1>予約ランキング</h1>
		</div>
	</div>
	<!-- <li v-for="shop in shops" v-bind:key="shop.id" > -->
		<li v-for="(shop , index) in shops" :key="shop.id" >
		<div class="reserve-ranking">{{index + 1}} 位</div>
		<div class="reserve-rank">
			<div><img :src="`/img/main/${shop.img}`"></div>
			<div class="reserve-rank-1">{{ shop.comments }}
			<br><br>予約数：{{ shop.reserve_count }}</div>
		</div>
	</li>

	<div class="main-home-h1">
	<div class="main-home-h1-2">
		<h1>おすすめランキング</h1>
	</div>
	</div>
	<!-- <li v-for="shop in shops" v-bind:key="shop.id" > -->
		<li v-for="(shop , index) in shops" :key="shop.id" >
		<div class="reserve-ranking">{{index + 1}} 位</div>
		<div class="reserve-rank">
			<div><img :src="`/img/main/${shop.img}`"></div>
			<div class="reserve-rank-1">{{ shop.comments }}</div>
		</div>
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
		created(){
			axios.get('/api/user/home')
			.then(response => {
				this.shops = response.data.shops;
			})
				.catch(error => {
				console.log(error)
			});
		} 
}
</script>