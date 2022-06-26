import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useQuestions() {

    const errors = ref('')
    const router = useRouter()

    const storeQuestions = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/questions', data)
            await router.push({ name: 'questions.create' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }


    return {
        errors,
        storeQuestions
    }
}
