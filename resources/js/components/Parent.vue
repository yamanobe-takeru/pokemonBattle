<template>
    <div>
        <img src="https://prtimes.jp/i/26665/26/resize/d26665-26-790125-0.jpg" align="left">

        <div v-for="poke in pokemon">
            <h1>{{poke.id}}{{poke.attributes.name}}</h1>

        </div>
        <div v-for="poke in pokemon">
            <button type="button" class="btn btn-secondary">{{poke.attributes.type1}}</button>
            <button type="button" class="btn btn-secondary">{{poke.attributes.type2}}</button>
        </div>

        <details>
            <summary>わざ</summary>

            <div v-for="poke in pokemon">
                <li>{{poke.attributes.skill1}}</li>
                <li>{{poke.attributes.skill2}}</li>
                <li>{{poke.attributes.skill3}}</li>
                <button type="button" @click="openModal">モーダル</button>
                <child :pokemon="poke" v-show="showContent" @close="closeModal"></child>
            </div>

        </details>
    </div>

</template>

<script>
import Child from "./Child";
    export default {
        name: "Parent",
        components: {Child},
        data: function () {
            return {
                pokemon: [],
                errors: [],
                showContent: false
            }
        },
        methods: {
            openModal: function () {
                this.showContent = true;
                console.log(this.pokemon.id);
                // this.$emit('modal-was opened', this.pokemon.id);
            },
            closeModal: function () {
                this.showContent = false
            },
        },
        created: function () {
            axios.get('api/v1/pokemons')
                .then((response) => {
                    this.pokemon = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>

</style>
