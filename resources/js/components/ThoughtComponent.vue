<template>
    <div class="card">
        <!-- {{ since(idea.created_at) }} -->
        <div class="card-header">Publicado en {{ since(thought.created_at) }} - Última actualización: {{ since(thought.updated_at) }}</div>
        <!-- <div class="panel-heading">Publicado en {{ thought.created_at }} - Última actualización: {{ thought.updated_at }}</div> -->

        <div class="card-body">

            <input v-if="editMode" type="text" class="form-control" v-model="thought.description">
            <p v-else>{{ thought.description }}</p>

        </div>

        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success btn-sm" v-on:click="onClickUpdate()">
                Guardar
            </button>
            <button v-else class="btn btn-default btn-sm" v-on:click="onClickEdit()">
                Editar
            </button>

            <button class="btn btn-danger btn-sm" v-on:click="onClickDelete()">
                Eliminar
            </button>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    moment.locale('es');

    export default {
        props: ['thought'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            since: function(d) {
                return moment(d).fromNow();
            },
            onClickDelete() {
                axios.delete(`/thoughts/${this.thought.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    description: this.thought.description
                };
                axios.put(`/thoughts/${this.thought.id}`, params).then((response) => {
                    this.editMode = false;
                    const thought = response.data;
                    this.$emit('update', thought);
                });
            }
        }
    }
</script>
