<template>
    <div>
        <bookable-list-item
            title="Cheap Villa"
            content="A very cheap villa"
            :price="1000">
        </bookable-list-item>
        <bookable-list-item
            title="Cheap Villa 2"
            content="Another very cheap villa"
            :price="1500">
        </bookable-list-item>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem.vue";

export default {
    name: "Bookables",
    components: {
        BookableListItem,
    },
    created() {
        console.log("Created");
    },
    mounted() {
        console.log("Mounted");
    },
}
</script>

<style scoped>

</style>
