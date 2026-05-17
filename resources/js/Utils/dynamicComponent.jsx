import React from "react";

const modules = import.meta.glob("../Components/**/*.jsx");

export default function DynamicComponent({ name, props = {} }) {
    const path = Object.keys(modules).find((key) => key.endsWith(`/${name}.jsx`));

    if (!path) {
        console.warn(`⚠️ Component bulunamadı: ${name}`);
        return <div>Bilinmeyen bileşen: {name}</div>;
    }

    const importFn = modules[path];
    const Component = React.lazy(importFn);

    return (
        <React.Suspense fallback={<div>Yükleniyor...</div>}>
            <Component {...props} />
        </React.Suspense>
    );
}
