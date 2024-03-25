from PIL import Image
import os

def resize_images(input_dir, output_dir, width, height):
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)

    for filename in os.listdir(input_dir):
        if filename.endswith(('.jpg', '.jpeg', '.png', '.gif')):
            with Image.open(os.path.join(input_dir, filename)) as img:
                resized_img = img.resize((width, height))
                resized_img.save(os.path.join(output_dir, filename))

input_directory = 'c:/Users/Controlcar/Desktop/AJUSTADOR_IMG/ajustar'
output_directory = 'c:/Users/Controlcar/Desktop/AJUSTADOR_IMG/resized_images'

new_width = 500
new_height = 500

resize_images(input_directory, output_directory, new_width, new_height)
