<template>
  <card class="card-user">
    <img slot="image" src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
    <div class="author">
      <a href="#">
        <img class="avatar border-gray" src="img/faces/face-3.jpg" alt="..."/>

        <h4 class="title">{{ user.name }}<br />
          <small>{{ user.email }}</small>
        </h4>
      </a>
    </div>

    <p class="description text-center">
      <button href="#" title='绑定 Line' class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
    </p>

    <div slot="footer" class="text-center d-flex justify-content-center">
      <div class="legend">
        <div v-if="user.status === 1" ><i class="fa fa-circle text-success"></i>正常</div>
        <div v-else><i class="fa fa-circle text-danger"></i>禁用</div>
      </div>

    </div>
  </card>
</template>
<script>
  import Card from "../../../components/Cards/Card.vue";
  import api from "../../../../assets/js/const/api";

  export default {
    components: {
      Card
    },
    data () {
      return {
        details: [
          {
            title: '12',
            subTitle: 'Files'
          },
          {
            title: '2GB',
            subTitle: 'Used'
          },
          {
            title: '24,6$',
            subTitle: 'Spent'
          }
        ],
        user: this.getUserProfile(),
      }
    },
    methods: {
      getClasses (index) {
        var remainder = index % 3
        if (remainder === 0) {
          return 'col-md-3 col-md-offset-1'
        } else if (remainder === 2) {
          return 'col-md-4'
        } else {
          return 'col-md-3'
        }
      },

      getUserProfile: function (e) {
        let url = api.getRequestUrl('profile')
        console.log('request url', url);
        axios.get(url,)
            .then((response) => {
              console.log(response);
              if (response.status === 200) {
                console.log('resp:', response)
                sessionStorage.setItem('user', JSON.stringify(response.data.user))
                this.user = response.data.user
              } else {
                alert(' user profile request err.');
              }
            })
            .catch(function (error) {
              alert('user profile:' + error);
            });

        return []
      }
    }
  }

</script>
<style>

</style>
