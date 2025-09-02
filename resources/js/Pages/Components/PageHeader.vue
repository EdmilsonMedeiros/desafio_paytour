<template>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; border-left: 5px solid #6f42c1;">
                <div class="card-body p-4">
                    <h2 class="h3 mb-1 fw-bold text-dark">
                        <i :class="[iconClass, 'text-primary me-2']"></i>
                        {{ title }}
                    </h2>
                    <p class="text-muted mb-0">{{ description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    iconClass: {
        type: String,
        required: true
    }
})
</script>