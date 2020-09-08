<template>
    <div class="container">
        <div class="row">
            <pokemon-battle-card :poke="pokemon"
                                 @edit-button-has-clicked="openModal($event)"/>
            <pokemon-edit-modal ref="pokemonEditModal"
            @skill-has-updated="updateData"/>
        </div>

    </div>
</template>

<script>
    import PokemonBattleCard from "./PokemonBattleCard";
    import PokemonEditModal from "./PokemonEditModal";

    export default {
        name: "PokemonBattlePage",
        components: {PokemonBattleCard, PokemonEditModal},
        data: function () {
            return {
                pokemon: [],
                errors: [],
            }
        },
        created: function () {
            this.loadData();
        },
        methods: {
            loadData: function () {
                axios.get('api/v1/pokemons')
                    .then((response) => {
                        this.pokemon = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            openModal: function ($event) {
                this.$refs.pokemonEditModal.open($event);
            },
            updateData: function () {
                this.loadData();
            }
        }
    }
</script>

<style scoped>

</style>
