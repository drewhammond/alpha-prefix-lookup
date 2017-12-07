<template>
    <div id="root">
        <form action="">
            <input class="form-control" v-model="search" type="text" id="search" placeholder="ABC">
        </form>

        <span>Searching for {{ search }} </span>
        <ul id="policy-list">
            <li v-for="prefix in prefixes | dosearch search">{{ prefix.prefix }}</li>
        </ul>
    </div>

</template>

<script>

    export default {
        data() {
            return {
                search: '',
                prefixes: [
                    {
                        prefix: "ABC",
                        name: "BCBS of Testville",
                    }
                ]
            }
        },

        filters: {
            dosearch: function (search) {
                console.log("sdfs");
                return search;
            }
        },

        mounted() {
            this.listenForChanges();
        },

        methods: {
            listenForChanges() {
                console.log("Listening for changes");
            }
        }
    }
</script>
