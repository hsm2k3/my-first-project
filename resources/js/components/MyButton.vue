<template>
    <div>
        <button :type="type" class="my-button" v-text="text"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'text',
            'type',
        ]
    }
</script>

<style>
    .my-button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        font-weight: bold;
    }
</style>

<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-md-8">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">Example Component</div>-->

<!--                    <div class="card-body">-->
<!--                        I'm an example component.-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
