<template>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>
      <div id="face">{{ faceEmoji }}</div>
      <form @submit.prevent="handleSubmit">
        <div class="input-box">
          <input
            type="text"
            id="username"
            v-model="username"
            required
          />
          <label>Username</label>
        </div>
        <div class="input-box">
          <input
            type="password"
            id="password"
            v-model="password"
            required
          />
          <label>Password</label>
        </div>
        <button
          type="submit"
          id="loginBtn"
          :disabled="!formFilled"
          :class="{ enabled: formFilled }"
          @mouseover="handleMouseOver"
          @mouseleave="handleMouseLeave"
        >
          Login
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>

import { router } from '@inertiajs/vue3'

const handleSubmit = () => {
  router.post('/login', {
    email: username.value,
    password: password.value,
    remember: false
  }, {
    onSuccess: () => {
      // التوجيه إلى Dashboard بعد تسجيل الدخول
      router.visit('/dashboard')
    },
    onError: (errors) => {
      faceEmoji.value = '❌'
      alert('فشل تسجيل الدخول: ' + (errors.email || errors.password || 'بيانات غير صحيحة'))
    }
  })
}

import { ref, computed } from 'vue'

const username = ref('')
const password = ref('')
const faceEmoji = ref('😐')
const isHovering = ref(false)

const formFilled = computed(() => {
  return username.value.trim() !== '' && password.value.trim() !== ''
})

const checkInputs = () => {
  if (formFilled.value) {
    faceEmoji.value = '😊'
  } else {
    faceEmoji.value = '😐'
  }
}

const handleMouseOver = () => {
  if (!formFilled.value) {
    faceEmoji.value = '😜'
  }
}

const handleMouseLeave = () => {
  if (!formFilled.value) {
    faceEmoji.value = '😐'
  }
}

const handleSubmit = (e) => {
  faceEmoji.value = '🎉'
  alert('Logged in successfully!')
  // هنا يمكنك إضافة منطق تسجيل الدخول الفعلي
}
</script>

<style>
.login-container {
  margin: 0;
  padding: 0;
  background: linear-gradient(135deg, #1f1c2c, #928dab);
  font-family: 'Segoe UI', sans-serif;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-box {
  background: rgba(255, 255, 255, 0.05);
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.1);
  width: 320px;
  text-align: center;
  animation: fadeIn 1.2s ease;
  position: relative;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

.login-box h2 {
  color: white;
  margin-bottom: 10px;
}

#face {
  font-size: 3rem;
  margin-bottom: 20px;
  transition: 0.3s ease;
}

.input-box {
  position: relative;
  margin-bottom: 30px;
}

.input-box input {
  width: 100%;
  padding: 10px 10px;
  background: transparent;
  border: none;
  border-bottom: 2px solid white;
  outline: none;
  color: white;
  font-size: 1rem;
}

.input-box label {
  position: absolute;
  left: 10px;
  top: 10px;
  color: white;
  pointer-events: none;
  transition: 0.3s ease;
}

.input-box input:focus ~ label,
.input-box input:valid ~ label {
  top: -12px;
  left: 5px;
  font-size: 0.8rem;
  color: #00ffe5;
}

button {
  width: 100%;
  padding: 12px;
  border: none;
  outline: none;
  background: #00ffe5;
  color: black;
  font-weight: bold;
  border-radius: 25px;
  cursor: pointer;
  transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
  position: relative;
}

button:disabled {
  background: #888;
  cursor: not-allowed;
}

button.enabled {
  background: #00ffe5;
  box-shadow: 0 0 10px #00ffe5, 0 0 40px #00ffe5;
}
</style>
