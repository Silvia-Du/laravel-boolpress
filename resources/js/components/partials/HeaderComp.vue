<template>

    <header>
        <div class="container h-100 d-flex align-items-center justify-content-center">
            <nav>
                <ul class="d-flex mb-0 pl-0">
                    <li><router-link :to="{name: 'home'}">Home</router-link></li>
                    <li><router-link :to="{name:'about'}">About</router-link></li>
                    <li><router-link :to="{name: 'courses'}">Corsi</router-link></li>
                    <li><router-link :to="{name: 'blog'}">Blog</router-link></li>
                    <li><router-link :to="{name: 'contacts'}">Contatti</router-link></li>
                </ul>
            </nav>
        </div>
    </header>

</template>

<script>
export default {
    name: 'HeaderComp',
}
</script>

<style lang="scss" scoped>

    header{
        height: 70px;
        background-color: whitesmoke;
        ul{
            list-style: none;
            li{
                a{
                    margin: 0 20px;
                    color: rgb(36, 36, 36);
                    font-weight: bold;
                    font-size: 1.2rem;
                    &.active, &:hover{
                        color: rgb(2, 11, 134);
                        text-decoration: none;
                    }

                }
            }
        }
    }

</style>
