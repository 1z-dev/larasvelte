<script lang="ts">
    import { Link } from '@inertiajs/svelte';
</script>

<svelte:head>
    <title>Welcome</title>
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</svelte:head>

<div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-4 text-[#1b1b18] dark:bg-[#0a0a0a] justify-center lg:p-8">
    <div class="flex flex-col items-center border border-[#19140035] dark:border-[#3E3E3A] p-20 lg:p-30 rounded-3xl">
        <h1 class="text-[#1b1b18] dark:text-[#EDEDEC] font-bold text-2xl mb-10">Welkom!</h1>
        <header class="not-has-[nav]:hidden mb-6 w-full  text-sm lg:max-w-4xl">
            <nav class="flex items-center justify-center gap-4">
                    <Link
                        as="button"
                        href="/login"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                        <Link
                            as="button"
                            href="/register"
                            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                        >
                            Register
                        </Link>
            </nav>
        </header>
    </div>
</div>
