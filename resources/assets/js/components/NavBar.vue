<template>
    <div class="fixed pin-t w-full bg-white z-40 pin-t flex justify-between items-center h-16 md:h-12 border-b-2 border-site-primary px-4">
        <div class="">
            <a href="/" class="no-underline text-site-secondary font-bold text-lg font-cursive">TaipeiTeachers</a>
        </div>
        <input type="checkbox" id="nav-trigger" class="hidden nav-select">
        <ul class="list-reset pl-0 flex-auto block md:flex justify-end items-center text-site-secondary font-cursive nav-menu bg-site-primary md:bg-white pt-20 md:pt-0">
            <li class="has-dropdown" @mouseenter="exposeTeachers = true" @mouseleave="exposeTeachers = false" @click="exposeTeachers = !exposeTeachers" :class="{'expose': exposeTeachers}">
            <span class="hidden md:inline no-underline font-bold mx-4 text-lg text-white md:text-site-secondary" :class="{'opacity-75': exposeTeachers}">
            Teachers
            <svg class="hidden md:inline align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="16px"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </span>
                <div class="dropdown bg-site-primary md:bg-white p-2 pl-4 md:pl-12 md:p-4 md:shadow rounded">
                    <div class="my-4 pb-0 md:pb-4">
                        <a href="/new-teachers" class="no-underline">
                            <p class="tracking-normal text-lg md:text-base text-white md:text-site-primary font-cursive font-bold">New Teachers</p>
                            <p class="hidden md:block text-sm text-grey-darkest mt-1">First time teaching ESL? We have just what you need.</p>
                        </a>
                    </div>
                    <div class="my-4">
                        <a href="/experienced-teachers" class="no-underline">
                            <p class="tracking-normal text-lg md:text-base text-white md:text-site-primary font-cursive font-bold">Experienced Teachers</p>
                            <p class="hidden md:block text-sm text-grey-darkest mt-1">Not your first rodeo? Go straight to the goods.</p>
                        </a>
                    </div>
                </div>
            </li>
            <li class="mb-6 md:mb-0">
                <a href="/faqs" class="no-underline  text-white md:text-site-secondary font-bold mx-4 text-lg">FAQs</a>
            </li>
            <li class="mb-6 md:mb-0">
                <a href="/ask-a-teacher" class="no-underline text-white md:text-site-secondary font-bold mx-4 text-lg">Ask Us</a>
            </li>
            <li class="mb-6 md:mb-0">
                <a href="/info" class="no-underline  text-white md:text-site-secondary font-bold mx-4 text-lg">Links</a>
            </li>
            <li class="mb-6 md:mb-0">
                <a href="/blog" class="no-underline  text-white md:text-site-secondary font-bold mx-4 text-lg">Blog</a>
            </li>
        </ul>
        <label for="nav-trigger" class="block md:hidden  text-site-primary md:text-site-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </label>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                exposeTeachers: false
            };
        }
    }
</script>

<style scoped lang="scss" type="text/scss">
    @media (max-width: 576px) {
        .nav-menu {
            position: fixed;
            left: 0;
            right: 0;
            top: 3rem;
            bottom: 0;
            z-index: 50;
            transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
            transform: translate3d(-100%, 0, 0);
        }

        .nav-select:checked + .nav-menu {
            transform: translate3d(0, 0, 0);
        }

        .nav-menu {
            .has-dropdown {
                position: relative;
                .dropdown {
                    position: static;
                    transform: none;
                }

                &:hover {
                    .dropdown {
                        z-index: 50;
                        transform: none;
                    }
                }
            }
        }
    }

    .has-dropdown {
        position: relative;
        .dropdown {
            position: absolute;
            transition: 0.3s;
            width: 250px;
            top: 100%;
            left: 50%;
            transform-origin: top;
            transform: translateX(-50%) rotateX(90deg);
        }

        &.expose {
            .dropdown {
                z-index: 50;
                transform: translateX(-50%) rotateX(0deg);
            }
        }
    }
</style>