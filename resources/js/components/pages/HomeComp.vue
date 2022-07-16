<template>

  <div class="main-content py-5 container">
    <div class="logo debug text-center py-4 mb-5"><h1>Logo</h1></div>

    <div class="jumbotron debug">
        <div class="cta px-5 py-4 text-center">
            <h4 class="mb-3">Call to action</h4>
            <button type="button" class="btn sd-btn btn-info">Read More</button>
        </div>
    </div>
    <div class="row">
        <!-- preview post -->
        <div class="col-9 mb-4">
            <div class="preview debug d-flex">
                <div class="img debug d-flex flex-column">img</div>
                <!-- post-data -->
                <div class="text p-2">
                    <p class="category">Categoria</p>
                    <h4 class="title">Titolo post</h4>
                    <p class="content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore dignissimos nulla esse debitis ab est? Aliquid, dolorum aliquam numquam beatae facilis </p>
                    <button type="button" class="btn sd-btn btn-info mb-2">Read More</button>
                    <p class="date">da/ta/ta</p>

                </div>
            </div>
        </div>

        <!-- aside-bar -->
        <div class="col-3 px-1 aside-bar">
            <div class="box">

                <div class="about py-3 px-2">
                    <h5 class="mb-2 title">About me</h5>
                    <div class="img-little debug mb-2"></div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis voluptates dignissimos, minus maxime id ipsum itaque cupiditate magni earum soluta.</p>
                    <h5>Firma</h5>
                </div>

                <div class="popular py-3 px-2 mb-3">
                    <h5 class="mb-2 title">Popular Posts</h5>

                    <div class="little-post p-1 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="category mb-1 text-uppercase">Category</p>
                            <p class="">Titolo</p>
                        </div>
                        <div class="img-preview debug"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</template>

<script>
export default {
    name: 'HomeComp'
}
</script>

<style lang="scss" scoped>

.main-content{
    .logo{
        width: 300px;

        margin: 0 auto;
    }

    .jumbotron{
        height: 400px;
        position: relative;
        .cta{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: whitesmoke;
            width: 300px;

        }
    }

    .row{

        .preview, .aside-bar{
            .category{
                color: cadetblue;
                font-size: 0.7rem;
                font-weight: bolder;
            }
            .content{
                color: gray;
            }
            .title{
                text-transform: uppercase;
            }
        }
        .preview{
            box-shadow: 0 0 1px 0px gray;
            min-height: 240px;
            background-color: whitesmoke;
            .img{
                width: 50%;
                height: 100%;
            }
        }

        .about{
            cursor: pointer;
            // border: 1px solid gray;
        color: rgb(36, 36, 36);
            .img-little{
                height: 150px;
            }
        }


        .aside-bar{
            .box{
                background-color: whitesmoke;
            }
            .little-post{
                border-top: 1px solid gray;
                border-bottom: 1px solid gray;
                .img-preview{
                    height: 70px;
                    width: 40%;
                }
            }
        }

    }

     .sd-btn{
        border-radius: 0px;
    }


}

</style>
