<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Hello World</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.css"> -->
  <style type="text/css">
    body {
      padding-top: 40px;
    }
  </style>
</head>

<body>
  <!-- <p>Testes Vue</p> -->

  <div id="root" class="container">

    <!-- <modal v-if="showModal" @close="showModal = false">
      <p>teste, teste, alomsom, Teste</p>
    </modal>
    <button @click="showModal = true" @close>Show modal</button>
     -->
    <!-- <tabs>
       <tab name="About Us">
         <h1>Here is about us</h1>
       </tab>

       <tab name="About our culture" :selected="true">
         <h1>About our culture</h1>
       </tab>

       <tab name="About our beliefs">
         <h1>Some xit</h1>
       </tab>

    </tabs> -->

    <!--events <coupon @applied="onCouponApplied"></coupon>

    <h1 v-if="couponApplied">You inserted a coupon!</h1> -->

    <!-- <message title="hello world" body="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."></message> -->

    <!-- <task-list></task-list> -->

    <!-- templates <modal>
      <template slot="header">testandooo</template>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      <template slot="footer">
      <button class="button is-success">Save changes</button>
      <button class="button">Cancel</button>
      </template>
    </modal> -->

    <progress-view inline-template>
      <div>
      <h1>Your progress is now: @{{ completionRate}}%</h1>
      <p><button @click="completionRate+=10">Update completion</button></p>
      </div>
    </progress-view>

    <!-- axios <ul>
      <li v-for="familia in familias" v-text="familia"></li>
    </ul> -->



  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.1/vue.js" charset="utf-8"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js" charset="utf-8"></script>
  <!-- <script src="js/app.js"></script> -->
  <script src="js/test.js"></script>

</body>

</html>
