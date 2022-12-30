<template>
    <div>
        <h1>Home Page</h1>
        <p>
            <router-link :to="{ name: 'Login' }">Login</router-link> |
            <router-link :to="{ name: 'Register' }">Register</router-link>\
        </p>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {}
</script>