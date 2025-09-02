<template>
    <div class="mb-3" v-if="page.props.error && page.props.error.length > 0">
        <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #dc3545;">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill text-danger me-3" style="font-size: 1.2rem;"></i>
                <div class="fw-medium">{{ page.props.error }}</div>
            </div>
        </div>
    </div>
    <div class="mb-3" v-if="page.props.success && page.props.success.length > 0">
        <div class="alert alert-success border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #198754;">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-3" style="font-size: 1.2rem;"></i>
                <div class="fw-medium">{{ page.props.success }}</div>
            </div>
        </div>
    </div>
</template>

<script setup>  
import { usePage } from '@inertiajs/vue3';

const page = usePage();

</script>