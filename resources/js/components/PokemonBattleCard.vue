<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body" v-for="pokemon in poke" >
                <div class="mb-1" >
                    <img :src="pokemon.attributes.image_url" align="left" class="img-thumbnail" width="400" height="400">
                </div>
                <h1 class="mb-1">{{ pokemon.attributes.name }}</h1>
                <div class="row">
                    <h3><span v-for="type in pokemon.relationships.types" class="badge badge-secondary"
                              v-bind:style="{ backgroundColor:type.attributes.color }">{{ type.attributes.name }}</span>
                    </h3>
                </div>
                <details>
                    <summary>わざ</summary>
                    <div v-for="skill in pokemon.relationships.memorize_skills">
                        <li>{{skill.attributes.name }}</li>
                    </div>
                    <button type="button" class="btn btn-primary" @click="$emit('edit-button-has-clicked',pokemon)">編集</button>
                </details>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PokemonBattleCard",
        props: ['poke'],
        data: function () {
            return {
                skillName: '',
                showContent: false
            }
        },
    }
</script>

<style scoped>

</style>
