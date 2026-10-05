<x-layouts.app>
    <x-hero />
    <x-about />
    <x-education />
    <x-skills :skills="$skills" />
    <x-experience :experiences="$experiences" />
    <x-projects :projects="$projects" />
    <x-certifications :certifications="$certifications" />
    <x-services />
    <x-contact />
</x-layouts.app>