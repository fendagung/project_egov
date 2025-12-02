<div class="flex min-h-screen overflow-hidden">

    <!-- Sidebar -->
    <x-app.sidebar :variant="$sidebarVariant ?? 'default'" />

    <!-- Content -->
    <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">

        <!-- Header -->
        <x-app.header :variant="$headerVariant ?? 'default'" />

        <!-- FIX FULL WIDTH -->
        <main class="w-full px-10 py-8">
            {{ $slot }}
        </main>

    </div>

</div>
