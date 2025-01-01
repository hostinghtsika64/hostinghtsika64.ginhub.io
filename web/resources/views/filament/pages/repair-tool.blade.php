<x-filament-panels::page>

    <style>
        .repair-tool-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 10px;
        }
        .repair-tool-action {
            width: 100%;
            cursor: pointer;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            margin: 10px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }
        .repair-tool-action:hover {
            background: #f9f9f9;
            box-shadow: 0px 0px 3px #ccc;
        }
    </style>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="repair-tool-wrapper">
            <div wire:click="runRepair" class="repair-tool-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" viewBox="0 0 512 512"><path fill="currentColor" d="m241.406 21l-15.22 34.75a182 182 0 0 0-23.467 2.97l-23.282-30.064l-25.094 8.532l-.125 38.25c-10.63 5.464-20.817 12.07-30.44 19.78L88.313 79.25L70.156 98.563L88.312 133a180.6 180.6 0 0 0-15.218 26.094l-38.938 1.062l-7.906 25.28l31.438 23.158c-1.505 9.38-2.24 18.858-2.282 28.344L20.5 254.625l3.656 26.25l38.313 7.5a182 182 0 0 0 8.5 23.5L45.72 343.22l14.093 22.436l39.25-9.187a185 185 0 0 0 7.718 8.53a187 187 0 0 0 17.72 16.125l-7.625 39.313l22.938 13.25l29.968-26.094a179.4 179.4 0 0 0 26.407 8.312l9.782 38.406l26.405 2.157l15.875-36.22c10.97-.66 21.904-2.3 32.656-4.938l25.22 29.22l24.593-9.844l-.72-14.813l-57.406-43.53c-16.712 4.225-34.042 5.356-51.063 3.436c-31.754-3.58-62.27-17.92-86.218-42.686c-54.738-56.614-53.173-146.67 3.438-201.406c27.42-26.513 62.69-39.963 98-40.344c37.59-.406 75.214 13.996 103.438 43.187c45.935 47.512 52.196 118.985 19.562 173.095l31.97 24.25a181 181 0 0 0 10.75-19.375l38.655-1.063l7.906-25.28l-31.217-23a183 183 0 0 0 2.28-28.594l34.688-17.625l-3.655-26.25l-38.28-7.5a182 182 0 0 0-12.75-32.125l22.81-31.594l-15.25-21.657l-37.56 10.906c-.472-.5-.93-1.007-1.408-1.5a185 185 0 0 0-18.937-17.064l7.188-37.125L334 43.78l-28.5 24.814c-9.226-3.713-18.702-6.603-28.313-8.75l-9.343-36.688zM183.25 174.5c-10.344.118-20.597 2.658-30 7.28l45.22 34.314c13.676 10.376 17.555 30.095 7.06 43.937c-10.498 13.85-30.656 15.932-44.53 5.408l-45.188-34.282c-4.627 24.793 4.135 51.063 25.594 67.344c19.245 14.597 43.944 17.33 65.22 9.688l4.78-1.72l4.03 3.063l135.19 102.564l4.03 3.062l-.344 5.063c-1.637 22.55 7.59 45.61 26.844 60.217c21.46 16.28 49.145 17.63 71.78 6.5l-45.186-34.28c-13.874-10.526-17.282-30.506-6.78-44.344c10.5-13.84 30.537-15.405 44.217-5.032l45.188 34.283c4.616-24.784-4.11-51.067-25.563-67.344c-19.313-14.658-43.817-17.562-64.968-10.033l-4.75 1.688l-4.03-3.063l-135.19-102.562l-4.03-3.063l.344-5.03c1.55-22.387-7.85-45.194-27.157-59.845c-12.544-9.516-27.222-13.978-41.78-13.812zm43.563 90.25l163.875 124.344L379.406 404L215.5 279.625z"/></svg>
                <div>
                    Run Repair
                </div>
            </div>
            <div wire:click="runDomainRepair" class="repair-tool-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" viewBox="0 0 24 24"><path fill="currentColor" d="M2 14a1 1 0 1 1-2 0a1 1 0 0 1 2 0" opacity="0.5"/><path fill="currentColor" d="M6.719 10.262a1.73 1.73 0 0 0-2.458 0a1.757 1.757 0 0 0 0 2.476a1.73 1.73 0 0 0 2.458 0a.75.75 0 0 1 1.062 1.059a3.23 3.23 0 0 1-4.583 0a3.257 3.257 0 0 1 0-4.594a3.23 3.23 0 0 1 4.583 0a.75.75 0 0 1-1.062 1.059M8.5 11.5a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0m3.25-1.75a1.75 1.75 0 1 0 0 3.5a1.75 1.75 0 0 0 0-3.5M18 8.25c-1.395 0-2.5 1.15-2.5 2.536V14a.75.75 0 0 0 1.5 0v-3.214c0-.587.462-1.036 1-1.036s1 .45 1 1.036V14a.75.75 0 0 0 1.5 0v-3.214c0-.587.462-1.036 1-1.036s1 .45 1 1.036V14a.75.75 0 0 0 1.5 0v-3.214C24 9.4 22.895 8.25 21.5 8.25c-.686 0-1.301.278-1.75.725A2.47 2.47 0 0 0 18 8.25"/></svg>
                <div>
                    Run Domain Repair
                </div>
            </div>
        </div>

    </div>

</x-filament-panels::page>