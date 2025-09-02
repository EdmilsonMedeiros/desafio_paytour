<template>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-white">
                                <h1 class="h4 mb-1 fw-bold">
                                    <i class="bi bi-person-circle me-2"></i>
                                    Bem-vindo, {{ page.props.user.name }}
                                </h1>
                                <p class="mb-0 opacity-75 small">
                                    <i class="bi bi-shield-check me-1"></i>
                                    Painel Administrativo
                                </p>
                            </div>
                            <div>
                                <button 
                                    class="btn btn-light btn-sm px-3 py-2 fw-semibold" 
                                    @click="logout"
                                    style="border-radius: 10px;"
                                >
                                    <i class="bi bi-box-arrow-right me-1"></i>
                                    Sair
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const page = usePage();

const logout = () => {
    router.post('/logout');
}
</script>