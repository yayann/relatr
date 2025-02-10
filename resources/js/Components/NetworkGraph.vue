<script setup>
import {onMounted, ref} from "vue";
import go from "gojs";
import {processData} from "@/helpers.js";

const props = defineProps({
    data: Object
});

const networkContainer = ref();

onMounted(() => {
    const $ = go.GraphObject.make;
    const diagram = $(go.Diagram, networkContainer.value, {
        layout: $(go.ForceDirectedLayout)
    });

    diagram.nodeTemplate =
        $(go.Node, "Auto",
            $(go.Shape, "Rectangle",
                new go.Binding("fill", "backgroundColor"),
                new go.Binding("stroke", "borderColor")),
            $(go.Panel, "Vertical",
                $(go.TextBlock,
                    new go.Binding("text", "label"),
                    {margin: 10, font: "12px sans-serif", wrap: go.TextBlock.WrapFit, width: 200}),
                $(go.Panel, "Vertical",
                    new go.Binding("itemArray", "consumers"),
                    {
                        itemTemplate: $(go.Panel, "Horizontal",
                            $(go.TextBlock, "", {margin: 2}),
                            $(go.TextBlock, new go.Binding("text", "name"), {margin: 2}),
                            $(go.TextBlock, {click: (e, obj) => console.log("Delete consumer clicked")}, "✖︎")
                        )
                    }
                )
            )
        );

    diagram.linkTemplate =
        $(go.Link,
            {curve: go.Link.Bezier},
            $(go.Shape),
            $(go.Shape, {toArrow: "Standard"})
        );

    const elements = processData(props.data);
    diagram.model = new go.GraphLinksModel(elements.nodes, elements.links);
});
</script>

<template>
    <div ref="networkContainer" style="width: 100%; height: 800px;"></div>
</template>

<style>
</style>
