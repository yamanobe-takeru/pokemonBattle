<template>
    <div>
        <div class="modal fade" id="pokemonEditModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <form>
                                <select name="select1" v-model="skill1[0]">
                                    <option v-for="memorizeSkill in pokemon.relationships.memorize_skills"
                                            :key="memorizeSkill.name"
                                            :value="memorizeSkill.id"
                                    >
                                        {{memorizeSkill.attributes.name}}
                                    </option>
                                    <option v-for="availableSkill in pokemon.relationships.available_skills"
                                            :key="availableSkill.name"
                                            :value="availableSkill.id">
                                        {{availableSkill.attributes.name}}
                                    </option>
                                </select>
                                <select name="select1" v-model="skill1[1]">
                                    <option v-for="memorizeSkill in pokemon.relationships.memorize_skills"
                                            :key="memorizeSkill.name"
                                            :value="memorizeSkill.id"
                                    >
                                        {{memorizeSkill.attributes.name}}
                                    </option>
                                    <option v-for="availableSkill in pokemon.relationships.available_skills"
                                            :key="availableSkill.name"
                                            :value="availableSkill.id">
                                        {{availableSkill.attributes.name}}
                                    </option>
                                </select>
                                <select name="select1" v-model="skill1[2]">
                                <option v-for="memorizeSkill in pokemon.relationships.memorize_skills"
                                        :key="memorizeSkill.name"
                                        :value="memorizeSkill.id"
                                >
                                    {{memorizeSkill.attributes.name}}
                                </option>
                                <option v-for="availableSkill in pokemon.relationships.available_skills"
                                        :key="availableSkill.name"
                                        :value="availableSkill.id">
                                    {{availableSkill.attributes.name}}
                                </option>
                            </select>
                            </form>
                        </div>
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
</template>

<script>
    export default {
        name: "PokemonEditModal",

        data: function () {
            return {
                pokemon: {},
                skillList: {},
                skill1: [],
            }
        },
        created: function () {
            this.loadSkillData();
        },
        methods: {
            open: function (pokemon) {
                this.pokemon = pokemon;
               // this.skill1[0] = pokemon.relationships.memorize_skills.attributes.name;

                $('#pokemonEditModal').modal('show');
            },
            close: function () {
                $('#pokemonEditModal').modal('hide');
            },
            test: function () {
                console.log(this.pokemon);
            },
            loadSkillData: function () {
                axios.get('api/v1/pokemons/skill')
                    .then((response) => {
                        this.skillList = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            updateData: function () {
                axios.patch('api/v1/pokemons/' + this.pokemon.id, {
                    'skill1': [this.skill1[0], this.skill1[1], this.skill1[2]]

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

</style>
