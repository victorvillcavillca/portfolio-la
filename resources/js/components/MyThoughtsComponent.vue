<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form-component @new="addThought"></form-component>
            <thought-component
                v-for="(thought, index) in thoughts"
                :key="thought.id"
                :thought="thought"
                @update="updateThought(index, ...arguments)"
                @delete="deleteThought(index)">
            </thought-component>

            <infinite-loading @infinite="infiniteHandler">
                <span slot="no-more" class="alert alert-info">
                    No hay más datos que cargar :(
                </span>
            </infinite-loading>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import moment from 'moment';
    import InfiniteLoading from 'vue-infinite-loading';

    moment.locale('es');

    export default {

        created() {
            // this.getThoughts();
        },
        data() {
            return {
                thoughts: []
            }
        },
        mounted() {
            console.log('my thought component');
        },

        methods: {
            getThoughts: function () {
               axios.get('/thoughts').then((response) => {
                    this.thoughts = response.data.data;
                });
            },
            infiniteHandler: function ($state) {
                let limit = this.thoughts.length / 40 + 1;
                axios.get('/thoughts', { params: { page: limit } }).then(response => {
                    this.loadMore($state, response);
                });
            },
            loadMore: function ($state, response) {
                if ( response.data.data.length ) {
                    this.thoughts = this.thoughts.concat(response.data.data);
                    setTimeout(() => {
                        $state.loaded();
                    }, 3000);

                    if ( response.data.total == this.thoughts.length ) {
                        $state.complete();
                    }
                } else {
                    $state.complete();
                }
            },
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
