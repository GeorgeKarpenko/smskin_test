<template>
<div>
    <b-navbar type="dark" variant="dark">
        <b-container>
            <b-navbar-nav>
                <b-nav-item :to="{name: 'index'}" active-class="active" exact >Главная страница</b-nav-item>
                <b-nav-item :to="{name: 'articles'}" active-class="active">Каталог статей</b-nav-item>
            </b-navbar-nav>
        </b-container>
    </b-navbar>
    <b-container>
        <router-view></router-view>
    </b-container>
</div>
</template>

<script>
export default {
    data(){
        return{
            isExactActive: true
        }
    }
}
</script>