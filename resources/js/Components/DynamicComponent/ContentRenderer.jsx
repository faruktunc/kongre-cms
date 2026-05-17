import React from 'react';

export default function ContentRenderer({ content = [] }) {
    if (!content || content.length === 0) {
        return <p className="text-gray-500 dark:text-gray-400">İçerik bulunamadı</p>;
    }

    return (
        <div className="space-y-6 ">
            {content.map((item, index) => {
                switch (item.type) {
                    // Başlık
                    case 'heading':
                        return (
                            <h2
                                key={index}
                                className="text-3xl font-bold mt-6 mb-4 text-gray-900 dark:text-white"
                            >
                                {item.value}
                            </h2>
                        );

                    // Alt Başlık
                    case 'subheading':
                        return (
                            <h3
                                key={index}
                                className="text-2xl font-semibold mt-5 mb-3 text-gray-800 dark:text-gray-200"
                            >
                                {item.value}
                            </h3>
                        );

                    // Paragraf
                    case 'paragraph':
                        return (
                            <p
                                key={index}
                                className="text-gray-700 dark:text-gray-300 leading-relaxed text-base"
                            >
                                {item.value}
                            </p>
                        );

                    // Tablo
                    case 'table':
                        return (
                            <div key={index} className="overflow-x-auto my-6">
                                <table className="w-full border-collapse border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
                                    <thead className="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            {item.headers?.map((header, idx) => (
                                                <th
                                                    key={idx}
                                                    className="border border-gray-300 dark:border-gray-600 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white"
                                                >
                                                    {header}
                                                </th>
                                            ))}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {item.rows?.map((row, rowIdx) => (
                                            <tr
                                                key={rowIdx}
                                                className="hover:bg-gray-50 dark:hover:bg-gray-600 transition"
                                            >
                                                {row.map((cell, cellIdx) => (
                                                    <td
                                                        key={cellIdx}
                                                        className="border border-gray-300 dark:border-gray-600 px-4 py-3 text-gray-700 dark:text-gray-300"
                                                    >
                                                        {cell}
                                                    </td>
                                                ))}
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        );

                    // Liste
                    case 'list':
                        return (
                            <ul
                                key={index}
                                className="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mb-4 ml-2"
                            >
                                {item.items?.map((listItem, idx) => (
                                    <li key={idx} className="text-base">
                                        {listItem}
                                    </li>
                                ))}
                            </ul>
                        );

                    // Resim
                    case 'image':
                        return (
                            <figure key={index} className="my-6">
                                <img
                                    src={item.src}
                                    alt={item.alt || 'Resim'}
                                    className="w-full h-auto rounded-lg shadow-lg max-h-96 object-cover"
                                />
                                {item.caption && (
                                    <figcaption className="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center italic">
                                        {item.caption}
                                    </figcaption>
                                )}
                            </figure>
                        );

                    // HTML İçeriği
                    case 'html':
                        return (
                            <div
                                key={index}
                                className="my-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700"
                                dangerouslySetInnerHTML={{ __html: item.value }}
                            />
                        );

                    // Ayırıcı
                    case 'divider':
                        return (
                            <hr
                                key={index}
                                className="my-8 border-0 border-t-2 border-gray-300 dark:border-gray-600"
                            />
                        );

                    // Video
                    case 'video':
                        return (
                            <div key={index} className="my-6">
                                <video
                                    controls
                                    className="w-full h-auto rounded-lg shadow-lg"
                                >
                                    <source src={item.src} type={item.type || 'video/mp4'} />
                                    Tarayıcınız video etiketini desteklemiyor.
                                </video>
                            </div>
                        );
                    case 'alert':
                        return (
                            <div
                                key={index}
                                className={`my-6 p-4 rounded-lg border-l-4 ${
                                    item.severity === 'warning'
                                        ? 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-400 dark:border-yellow-600 text-yellow-800 dark:text-yellow-200'
                                        : item.severity === 'error'
                                        ? 'bg-red-50 dark:bg-red-900/20 border-red-400 dark:border-red-600 text-red-800 dark:text-red-200'
                                        : item.severity === 'success'
                                        ? 'bg-green-50 dark:bg-green-900/20 border-green-400 dark:border-green-600 text-green-800 dark:text-green-200'
                                        : 'bg-blue-50 dark:bg-blue-900/20 border-blue-400 dark:border-blue-600 text-blue-800 dark:text-blue-200'
                                }`}
                            >
                                {item.title && (
                                    <h4 className="font-semibold mb-2">{item.title}</h4>
                                )}
                                <p>{item.value}</p>
                            </div>
                        );

                    default:
                        return null;
                }
            })}
        </div>
    );
}