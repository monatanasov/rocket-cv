<template>
    <span class="text-red-600 font-semibold">
        *
    </span>
    <p
        v-if="showText"
        class="inline text-red-500 text-sm font-semibold"
    >
        Required fields
    </p>
</template>

<script>
export default {
    name: 'asterisk',
    props: {
        showText: {
            type: Boolean,
            default: false,
        },
    },
};
</script>
