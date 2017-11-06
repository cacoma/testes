<template>
 <div>
  <input type="text" placeholder="cidade" v-model="query" v-on:keyup="autoComplete" class="form-control">
  <div class="panel-footer" v-if="results.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="result in results">
     {{ result.name }}
    </li>
   </ul>
  </div>
 </div>
</template>
<script>
 export default{
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 2){
     axios.get('/laravel/api/searchcities',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     }).then(response => { 
	console.log(response)
})
.catch(error => {
    console.log(error.response)
});
    }
   }
  }
 }
</script>