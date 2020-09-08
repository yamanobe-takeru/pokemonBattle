<template>
    <div>
        <div id="overlay">
            <div class="modal" tabindex="-1" id="pokemonEditModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                        </div>
                        <div class="modal-body">

                            <form>
                                <!--                                <p>わざ1 <input type="text" name="skill1" v-model="val.attributes.skill1"></p>-->
                                <!--                         値渡しではない。       <div v-for="poke in val">-->
                                <!--                                    <p>わざ1 <input type="text" name="skill1" v-model="poke.attributes.skill1"></p>-->
                                <!--                                    <p>わざ2 <input type="text" name="skill2" v-model="poke.attributes.skill2"></p>-->
                                <!--                                    <p>わざ3 <input type="text" name="skill3" v-model="poke.attributes.skill3"></p>-->
                                <!--                                </div>-->
                                <p>わざ1 <input type="text" name="skill1" v-model="skill1"></p>
                                <p>わざ2 <input type="text" name="skill2" v-model="skill2"></p>
                                <p>わざ3 <input type="text" name="skill3" v-model="skill3"></p>
                                <textarea>{{pokemon.attributes}}</textarea>


                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click=test>
                                値テスト
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    @click="$emit('close')">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary" @click="updateData">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Child",
        props: ['pokemon'],
        data: function () {
            return {
                skill1: '',
                skill2: '',
                skill3: '',
                showContent: false
            }
        },
        methods: {
            clickEvent: function () {
                this.$emit('from-child')
            },
            test: function () {
                console.log(this.pokemon.id);
                //  console.log(this.val.id);//undefined
                // console.log(this.val.skill1);//undefined
                // console.log(this.val.attributes.skill1);//Type error
            },
            updateData: function () {
                axios.patch('api/v1/pokemons/' + this.pokemon.id, {
                    'skill1': "",
                    'skill2': "",
                    'skill3': "",

                })
                    .then((response) => {
                        this.$emit('skill-has-updated', response.data.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>
    #overlay {
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #content {
        z-index: 2;
        width: 50%;
        padding-top: 5em;
        padding-bottom: 5em;
        text-align: center;
    }

    #content > img {
        width: 95%;
    }

</style>
