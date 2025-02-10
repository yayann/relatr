const processData = (rawData) => {
    const nodes = [];
    const links = [];

    rawData.forEach((entity) => {
        // Add provider node
        nodes.push({
            key: entity.id,
            label: entity.name,
            consumers: entity.consumers,
            type: entity.type,
            backgroundColor: entity.type === 'actor' ? '#F5F0E4' : '#EFEFEF',
            borderColor: '#B7B3AA'
        });

        // Add edges from to_providers
        entity.to_providers.forEach((provider) => {
            links.push({
                from: entity.id,
                to: provider.id
            });
        });
    });

    return {nodes, links};
};

export {processData};
