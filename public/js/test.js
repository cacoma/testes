// Vue.component('task-list', {
//   template: `<div>
//                     <task v-for="task in tasks" :key="task.id">{{task.task}}</task>
//             </div>`,
//   data() {
//     return {
//       tasks: [{
//         task: 'varrer a casa',
//         complete: true
//       }, {
//         task: 'Comer',
//         complete: true
//       }, {
//         task: 'limpar a pia',
//         complete: true
//       }, {
//         task: 'dormir',
//         complete: true
//       }]
//     };
//   }
// });
// Vue.component('task', {
//   template: '<li><slot></slot></li>'
// });
//
// message example
// Vue.component('message', {
//   props: ['title', 'body'],
//   data() {
//     return {
//       isVisible: true
//     };
//   },
//   template: `<article class="message" v-show='isVisible'>
//     <div class="message-header">
//       <p>{{title}}</p>
//       <button class="delete" aria-label="delete" @click="isVisible = false"></button>
//     </div>
//     <div class="message-body">
//       {{body}}
//     </div>
//   </article>`,
// })

//exemplo modal
// Vue.component('modal', {
//   template: `
//   <div class="modal is-active">
//   <div class="modal-background"></div>
//   <div class="modal-content">
//   <div class="box">
//     <p>
//     <slot></slot>
//     </p>
//     </div>
//   </div>
//   <button class="modal-close is-large" @click="$emit('close')"></button>
// </div>`,
// });

// new Vue({
//   el: '#root',
//   data: {
//     showModal: false
//   }
// });

//tabs
// Vue.component('tabs', {
//   template: `<div>
//   <div class="tabs">
//   <ul>
//     <li v-for="tab in tabs" :class="{ 'is-active' : tab.isActive }">
//     <a :href="tab.href" @click="selectTab(tab)">{{tab.name}}</a>
//     </li>
//   </ul>
// </div>
//   <div class="tabs-details">
//   <slot></slot>
//   </div>
//   </div>`,
//   data() {
//     return {
//       tabs: []
//     };
//   },
//
//   created() {
//     this.tabs = this.$children;
//     //console.log(this.$children);
//   },
//   methods: {
//     selectTab(selectedTab) {
//       this.tabs.forEach(tab => {
//         tab.isActive = (tab.name == selectedTab.name);
//       });
//     }
//   }
// });
// Vue.component('tab', {
//   template: `
//   <div v-show="isActive"><slot></slot></div>`,
//   props: {
//     name: {
//       required: true
//     },
//     selected: {
//       default: false
//     }
//   },
//   data() {
//     return {
//       isActive: false
//     };
//   },
//   computed: {
//     href(){
//       return '#' + this.name.toLowerCase().replace(/ /g,'-');
//     }
//   },
//   mounted() {
//     this.isActive = this.selected;
//   }
// })
//

//events
// window.Event = new class {
//
//   constructor() {
//     this.vue = new Vue();
//   }
//   fire(event, data = null) {
//     this.vue.$emit(event, data);
//   }
//   listen(event, callback) {
//     this.vue.$on(event, callback);
//   }
// }
//
// Vue.component('coupon',{
//   template: `<input placeholder="enter your coupon code" @blur="onCouponApplied" />`,
//
//   methods: {
//     onCouponApplied() {
//       Event.fire('applied');
//       // this.$emit('applied');
//     }
//   }
// });
//
//
// new Vue({
//   el: '#root',
//
//   data: {
//     couponApplied: false
//   },
//
//   created() {
//     Event.listen('applied', () => alert('Handling it'));
//   }
// });

// template Vue.component('modal', {
//   template: `
//
//   <div class="modal is-active">
//   <div class="modal-background"></div>
//
//   <div class="modal-card">
//     <header class="modal-card-head">
//       <p class="modal-card-title"><slot name="header"></slot></p>
//       <button class="delete" aria-label="close"></button>
//     </header>
//
//     <section class="modal-card-body">
//       <slot></slot>
//     </section>
//
//     <footer class="modal-card-foot">
//       <slot name="footer"></slot>
//     </footer>
//   </div>
// </div>`
// })

// progress view
Vue.component('progress-view',{
  data() {
    return { completionRate: 0 };
  }
});

// axios new Vue({
//   el: '#root',
//
//   data: {
//     familias: [],
//   },
//
//   mounted() {
//     axios.get('familias').then(response => this.familias = response.data);
//   }
// });

new Vue({
  el: '#root',
})

// function greet({name, age}) {
//   console.log(`Hello, ${name}. You are ${age}.`);
//   window.alert(`Hello, ${name}. You are ${age}.`);
//   document.write(`<h1>Hello, ${name}. You are ${age}.</h1>`);
// }
// /*
// greet({
//   name: 'Luke',
//   age: 20
// })
//
// greet({
//   name: 'Puma',
//   age: 8
// })
// */
// var names = ['Luke', 'Puma', 'Spike'];
// var ages = [20, 8, 7];
//
// for (var i = 0; i < names.length; i++) {
//   greet({name: names[i], age: ages[i]});
// }
//
