<template>
    <div id="root">
        <form action="">
            <input class="form-control input-lg" v-model="search" type="text" id="search" ref="search"
                   v-bind:placeholder="placeholder" :disabled="loaded == false" maxlength="3">
        </form>

        <p class="text-muted matches">Possible matches: {{ filteredItems.length }}</p>

        <ul id="policy-list" class="list-unstyled">
            <li v-for="prefix in filteredItems" v-if="search.length >= 1" class="policy-item">
                <span class="policy-prefix">{{ prefix.id }}</span>
                <span class="policy-name">{{ prefix.policy_name }}</span>
            </li>
        </ul>
    </div>

</template>

<script>

    export default {
        data() {
            return {
                search: '',
                prefixes: [],
                loaded: false,
                placeholder: 'Loading data. Please wait...'
            }
        },
        computed: {
            filteredItems() {
                return this.prefixes.filter(prefix => {
                    return prefix.id.toLowerCase().startsWith(this.search.toLowerCase()) === true
                })
            }

        },

        mounted() {
            this.getPrefixes();
            this.listenForChanges();
        },

        methods: {
            getPrefixes() {
                const vm = this;
                window.axios.get('/prefixes').then(function (response) {
                    // console.log(response);

                    vm.prefixes = response.data;
                    vm.placeholder = "Please enter alpha prefix...";
                    vm.loaded = true;

                    // Focus field
                    // Enable field and update placeholder

                    console.log("Did axios");
                })

            },
            listenForChanges() {
                console.log("Listening for changes");
            },
        },

    }
</script>
