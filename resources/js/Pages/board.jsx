import React, { useState, useEffect } from "react";
import DynamicComponent from "../Utils/dynamicComponent";
import { getBoardComponent } from "../Services/apiClientServices";
import MainLayout from "../Layout/main";

export default function board() {
    const [components, setComponents] = useState([]);

    useEffect(() => {
        getBoardComponent().then((data) => {
            if (Array.isArray(data)) {
                const sorted = data.filter(item => item.isActive).sort((a, b) => a.order - b.order);
                setComponents(sorted);
            }
        });
    }, []);

    return (
        <MainLayout>
            {components.map((comp) => (
                <DynamicComponent
                    key={comp.id}
                    name={comp.component}
                    props={comp.props}
                />
            ))}
        </MainLayout>
    );
}
