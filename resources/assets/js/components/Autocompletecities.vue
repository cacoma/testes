<template>
<div>
  <input type="text" list="listcities" placeholder="cidade" v-model="query" v-on:keyup="autoComplete" class="form-control" name="citySelection" id="citySelection" @change="changeItem($event)">
  <datalist id="listcities">
            <option v-for="result in results" v-bind:value="result.name" v-bind:label="result.name"></option>
    </datalist>
  <input type="text" id="ufselected" name="ufselected" v-bind:value="ufselected" disabled><br>
  <input type="text" id="countryselected" name="coutryselected" v-bind:value="countryselected" disabled>
</div>
</template>
<script>
export default {
  data() {
    return {
      query: '',
      results: [],
      ufselected: "ufselected",
      countryselected: "countryselected"
    }
  },
  methods: {
    autoComplete() {
      this.results = [];
      if (this.query.length > 4) {
        axios.get('/laravel/api/searchcities', {
            params: {
              query: this.query
            }
          }).then(response => {
            this.results = response.data;
          }).then(response => {
            console.log(response)
          })
          .catch(error => {
            console.log(error.response)
          });
      }
    },
    changeItem(event) {
      this.ufselected = `${event.target.value}`,
        console.log(this.ufselected),
        axios.get('/laravel/api/searchufs', {
          params: {
            event: this.ufselected
          }
        })
        .then(response => {
          this.ufselected = response.data;
        }).then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error.response)
        });
      this.countryselected = this.ufselected,
        console.log(this.countryselected),
        axios.get('/laravel/api/searchcountry', {
          params: {
            event: this.countryselected
          }
        }).then(response => {
          this.countryselected = response.data;
        }).then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error.response)
        });
    },
  }
}
</script>
