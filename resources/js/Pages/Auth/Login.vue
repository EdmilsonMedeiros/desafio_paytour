<template>
    <div class="min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #f8f9ff 0%, #e6eeff 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-9">
                    <!-- Logo/Brand Section -->
                    <div class="text-center mb-4">
                        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 20px;">
                            <div class="card-body py-4">
                                <h1 class="h3 text-white fw-bold mb-1">
                                    <i class="bi bi-shield-lock-fill me-2"></i>
                                    Paytour Admin
                                </h1>
                                <p class="text-white-50 mb-0">Acesso administrativo</p>
                            </div>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="h4 fw-bold text-dark mb-2">Fazer Login</h2>
                                <p class="text-muted mb-0">Digite suas credenciais para acessar</p>
                            </div>

                            <AlertMessage />

                            <form @submit.prevent="login">
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-envelope text-primary me-2"></i>
                                        E-mail
                                    </label>
                                    <input 
                                        type="email" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.email, 'border-primary': !page.props.errors.email }"
                                        id="email" 
                                        name="email" 
                                        v-model="form.email"
                                        placeholder="Digite seu e-mail"
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.email">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.email[0] }}
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-key text-primary me-2"></i>
                                        Senha
                                    </label>
                                    <input 
                                        type="password" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.password, 'border-primary': !page.props.errors.password }"
                                        id="password" 
                                        name="password" 
                                        v-model="form.password"
                                        placeholder="Digite sua senha"
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.password">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.password[0] }}
                                    </div>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid mb-3">
                                    <button 
                                        type="submit" 
                                        class="btn btn-lg fw-bold text-white py-3" 
                                        style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border: none; border-radius: 12px; text-transform: uppercase; letter-spacing: 1px;"
                                        :disabled="is_loading"
                                    >
                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        {{ is_loading ? 'Aguarde...' : 'Entrar' }}
                                    </button>
                                </div>

                                <!-- Back to Home -->
                                <div class="text-center">
                                    <a href="/" class="text-decoration-none text-muted">
                                        <i class="bi bi-arrow-left me-1"></i>
                                        Voltar ao site
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import AlertMessage from '../Components/AlertMessage.vue';

const page = usePage();
const is_loading = ref(false);

const form = useForm({
    email: '',
    password: '',
});

const login = () => {
    is_loading.value = true;

    router.post('/login', form, 
        {
            onSuccess: () => {
                is_loading.value = false;
            },
            onError: () => {
                is_loading.value = false;
            }
        }
    );
}
</script>

<style scoped>

</style>
