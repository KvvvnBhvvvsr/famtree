<?php 

	/*
		Where to even begin
		Designing a visualizer before I have the inkling of a front-end is certainly a choice
		Anyways
		Abbreviating "visualizer" to VIS


		Famtrees contained in data are potentially larger than can be displayed on one screen. Moreover, there are challenges in which data to display within one section of a tree.

		VIS initializes
			displays some region of the tree
			centers on one individual and starts from there?

		VIS can be maneuvered in real time
			receives user input about which directions to expand the tree, let's call this process "discovery"
			retrieves relationship(s) from DB
			incorporates discovered relationships and individuals into the currently displayed tree
				draws connections between new nodes and previously visualized nodes
				rearranges nodes to maintain visual clarity
					! this is a huge deal, and the last thing to solve for sure
				creates new prompts indicating directions in which to further expand/discover

		VIS needs to display a tree from a certain individual's or family's perspective
			this means ignoring (by default) connections through spouses, because the tree would become impossibly wide and convoluted within only two or three generations
			so, everything is centered on one side of a marriage's family
			this means that a spouse appears on the tree, but their parents and siblings don't
			unless the user asks the system to reveal/discover family on that side
				this would expand a small subtree starting from the spouse
					! does this imply that every discovery/expansion is kind of an analogous task... does this visualizer entail an inherently recursive process?

	*/

?>