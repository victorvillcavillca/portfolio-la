<template>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form-component @new="addThought"></form-component>

            <thought-component
                v-for="(thought, index) in thoughts"
                :key="thought.id"
                :thought="thought"
                @update="updateThought(index, ...arguments)"
                @delete="deleteThought(index)">
            </thought-component>

        </div>
    </div>
</template>

<script>
    import toastr from 'toastr'
    import moment from 'moment'

    moment.locale('es');

    export default {
        data() {
            return {
                thoughts: []
            }
        },

        mounted() {
            axios.get('/thoughts').then((response) => {
                console.log(response.data);
                this.thoughts = response.data;
            });
        },

        methods: {
            addThought(thought) {
                this.thoughts.unshift(thought);
                toastr.success('Nueva idea registrada');
            },
            updateThought(index, thought) {
                this.thoughts[index] = thought;
            },
            deleteThought(index) {
                this.thoughts.splice(index, 1);
                toastr.error('Eliminada');
            }
        }
    }
</script>
