<script>
    import { router } from '@inertiajs/svelte';

    let email = '';
    let password = '';
    let admin = '0';

function submit() {
    router.post('/register', {
        email,
        password,
        admin,
    });
}

</script>


<div class="flex min-h-screen flex-col items-center justify-center lg:p-8">
    <div class="flex flex-col items-center border border-[#19140035] dark:border-[#3E3E3A] p-10 lg:p-30 rounded-3xl">
        <header class="mb-6 w-full  text-sm lg:max-w-4xl">
            <form on:submit|preventDefault={submit} class="flex flex-col items-center justify-center gap-4">
                <input
                    type="email"
                    bind:value={email}
                    placeholder="test@example.com"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <input
                    type="password"
                    bind:value={password}
                    placeholder="password"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 mb-5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <button
                    type="submit"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Registreer
                </button>
            </form>
        </header>
    </div>
</div>