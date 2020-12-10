Vue.component('productos-view', {
	props: ['id', 'name', 'price'],
	template: `
		<div class="row">
			<div class="col-md-6">{{ name }}</div>
			<div class="col-md-3 text-right">{{ price }}</div>
			<div class="col-md-3"><button type="button" class="btn btn-primary btn-sm" v-bind:id="id" @click="show_id">Contratar</button></div>
		</div>`,
	methods: {
		show_id() {
			alert(this.id);
		}
	}
})

Vue.component('productos-contratados', {
	props: ['id', 'name'],
	template: `
		<div class="row bg-primary">
			<div class="col-md-6">{{ name }}</div>
			<div class="col-md-3"><button type="button" class="btn btn-primary btn-sm" v-bind:id="id" @click="show_id">Contratar</button></div>
		</div>
	`,
	methods: {
		show_id() {
			alert(this.id);
		}
	}
});

new Vue({
    el: '#admin-app',
	data: {
		productos: [],
		has_productos: false,
		user_id: 0
	},
	methods: {
		get_productos () {
			axios.get('allProducts')
			.then(response => {
				//console.log(response.data);
				this.productos = response.data;
			})
			.catch(e=> {
				console.log(e);
			});
		},
		get_contratados() {
			axios.get('contratadosByCliente/' + this.user_id)
			.then(response => {
				if (response.data.length > 0) {
					
				}
			})
			.catch(e=> {
				console.log(e);
			});
		},
		get_user_id() {
			axios.get('getUserID')
			.then(response => {
				//console.log(response.data);
				this.user_id = response.data;
				this.get_contratados();
			})
			.catch(e => {
				console.log(e);
			});
		}
	},
	created () {
        this.get_user_id();
        this.get_productos();
    }
})