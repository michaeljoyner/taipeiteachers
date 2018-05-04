<template>
    <div class="">
        <canvas class="ht_canvas"
                ref="canvas"></canvas>
     <slot></slot>
    </div>
</template>

<script type="text/babel">
    import hexRgb from "hex-rgb";
    export default {
        props: {
            bgColour: {
                type: String
            },
            blockSize: {
                type: Number,
                default: 30
            }
        },

        data() {
            return {
                ctx: null,
                width: 0,
                height: 0,
                rows: 0,
                cols: 0,
                blocks: [],
                red: 0,
                green: 0,
                blue: 0
            };
        },

        mounted() {
            this.setColours(hexRgb(this.bgColour));

            const {width, height} = getComputedStyle(this.$el);
            this.width = parseInt(width);
            this.height = parseInt(height);

            this.createBlocks();
            this.initCanvas();
            requestAnimationFrame(this.draw);
        },

        methods: {
            initCanvas() {
                this.$refs.canvas.width = this.width;
                this.$refs.canvas.height = this.height;
                this.ctx = this.$refs.canvas.getContext('2d');
            },

            setColours({red, green, blue}) {
                this.red = red;
                this.blue = blue;
                this.green = green;
            },

            createBlocks() {
                this.cols = Math.ceil(this.width / this.blockSize);
                this.rows = Math.ceil(this.height / this.blockSize);

                for (let x = 0; x < this.cols; x++) {
                    for (let y = 0; y < this.rows; y++) {
                        this.blocks.push({
                            x, y,
                            opacity: 0,
                            rate: 1 + Math.round(Math.random()*7)
                        });
                    }
                }
            },

            draw() {
                this.blocks.forEach(block => {
                    this.drawBlock(block);
                    block.opacity = Math.min(block.opacity + (block.rate/60), 1);
                });

                this.blocks = this.blocks.filter(block => block.opacity !== 1);
                if(this.blocks.length) {
                    requestAnimationFrame(this.draw);
                } else {
                    this.fillCanvas();
                }
            },

            drawBlock(block) {
                const size = this.blockSize;
                this.ctx.clearRect((block.x * size), (block.y * size), size, size);
                this.ctx.fillStyle = `rgba(${this.red},${this.green},${this.blue},${block.opacity})`;
                this.ctx.fillRect((block.x * size), (block.y * size), size, size);
            },

            fillCanvas() {
                this.ctx.fillStyle = `rgb(${this.red},${this.green},${this.blue})`;
                this.ctx.fillRect(0,0,this.width, this.height);
            }
        }

    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

    canvas.ht_canvas {
        z-index: -1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

</style>