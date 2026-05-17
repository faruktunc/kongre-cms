
import React, { useEffect, useState } from "react";
import DynamicComponent from "../Utils/dynamicComponent";
import { getHomeComponent } from "../Services/apiClientServices";
import MainLayout from "../Layout/main";

export default function Home() {
    const [components, setComponents] = useState([]);

    useEffect(() => {
        getHomeComponent().then((data) => {
            if (Array.isArray(data)) {
                const sorted = data.filter(item => item.isActive).sort((a,b) => a.order - b.order);
                setComponents(sorted);
            }
        });
    }, []);

    return (
        <>
            <MainLayout>
                {components.map((comp) => (
                    <DynamicComponent
                        key={comp.id}
                        name={comp.component}
                        props={comp.props}
                    />
                ))}
            </MainLayout>
        </>
    );
}
