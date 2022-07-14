<template>

    <header>
        <div class="container h-100 d-flex align-items-center justify-content-center">
            <nav>
                <ul class="d-flex mb-0 pl-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
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
                    font-size: 1.2rem;
                }
            }
        }
    }

</style>
